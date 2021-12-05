<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Kathford\Lib\Status;
use Kathford\Services\CategoryService;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoryForm extends Component
{
    use WithFileUploads;

    public int $parentCategory = 0;

    public array $childCategory = [];

    public int $subCategory = 0;

    public string $name = '';

    public string $slug = '';

    public string $description = '';

    public string $seo_description = '';

    public string $seo_title = '';

    public $icon;

    public int $status = Status::ACTIVE;

    public int $isShown = Status::ACTIVE;

    public array $filter = [
        'parentCategory' => 0,
        'subCategory' => 0,
        'childCategory' => [],
        'name' => '',
        'description' => '',
        'status' => '',
        'isShown' => '',
        'slug' => '',
        'seo_description' => '',
        'seo_title' => '',
        'icon' => '',
    ];

    protected function rules(): array
    {
        return [
            'name' => 'required|min:6',
            'parentCategory' => 'required|integer',
            'subCategory' => 'sometimes|nullable|integer',
            'description' => 'required|string|max:255|min:10',
            'status' => 'required',
            'isShown' => 'required',
            'slug' => 'required',
            'seo_title' => 'sometimes|nullable',
            'seo_description' => 'sometimes|nullable',
            'icon' => 'required|image|max:1024|mimes:png,svg,jpg,jpeg',
        ];
    }

    public function render()
    {
        $data['parent_categories'] = app(CategoryService::class)->getParentCategories();
        return view('livewire.category-form', compact('data'));
    }

    public function getChildCategory(): array
    {
        if ($this->parentCategory != 0) {
            $parentCategory = app(CategoryService::class)->findOrFail($this->parentCategory);
            $parentCategory = $parentCategory->load('subCategory');
            $this->childCategory = $parentCategory->subCategory()->pluck('name', 'id')->toArray();
        }

        return $this->childCategory;
    }

    public function submit()
    {
        $validatedData = $this->validate();
        $validatedData['created_by'] = auth()->id();

        $parentId = Arr::get($validatedData, 'parentCategory');
        $subCategory = Arr::get($validatedData, 'subCategory');

        /* Check the level of category */
        if ($parentId != 0 && $subCategory != 0) {
            $validatedData['level'] = 2;
            $validatedData['parent_id'] = $subCategory;
        } elseif ($parentId != 0 || $subCategory != 0) {
            $validatedData['level'] = 1;
            $validatedData['parent_id'] = $parentId ?? $subCategory;
        } else {
            $validatedData['level'] = 0;
            $validatedData['parent_id'] = 0;
        }

        $this->icon->store('category');
        $validatedData['icon'] = $this->icon;
        Category::query()->create($validatedData);
        session()->flash('success', 'Category Created Successfully.');
        $this->reset();
    }


    public function generateSlug(): string
    {
        $this->slug = Str::slug($this->name, '_');
        return $this->slug;
    }

}
