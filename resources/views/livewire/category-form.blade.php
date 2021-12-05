<div class="ibox-content">
    <form wire:submit.prevent="submit">
        <div class="container">

            {{-- Session message if success --}}
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            {{-- Ending for session message --}}

            <div class="row col-lg-12">
                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-bold mb-2" for="parent_category">Choose Parent Category</label>
                    <select wire:model.defer="parentCategory" id="parent_category" class="form-control"
                            wire:change="getChildCategory">
                        <option value="0">-- Select One --</option>
                        @foreach($data['parent_categories'] as $index => $parentCategory)
                            <option value="{{ $index }}">{{ $parentCategory }}</option>
                        @endforeach
                    </select>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-bold mb-2" for="subCategory">Choose Sub Category</label>
                    <select wire:model.defer="subCategory" id="subCategory" class="form-control">
                        @if(count($this->childCategory) > 0)
                            <option value="0">-- Select One --</option>
                            @foreach($this->childCategory as $index => $childCategory)
                                <option value="{{ $index }}">{{ $childCategory }}</option>
                            @endforeach
                        @endisset
                    </select>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <label class="required fs-3 fw-bold mb-2" for="name">Name</label>
                    <input type="text" class="form-control" id="name" wire:model="name" wire:change="generateSlug">
                    <div class="fv-plugins-message-container invalid-feedback"></div>

                    @error('name') <span class="error">{{ $message }}</span> @enderror

                </div>

            </div>

            <div class="row col-lg-12">
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-bold mb-2" for="description">Description</label>
                    <textarea wire:model.defer="description" id="description" cols="80" rows="10"
                              class="form-control"></textarea>
                    <div class="fv-plugins-message-container invalid-feedback"></div>

                    @error('description') <span class="error">{{ $message }}</span> @enderror

                </div>

            </div>

            <div class="row col-lg-12 mt-5">
                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-bold mb-2" for="status">Status</label>
                    <select wire:model.defer="status" id="status" class="form-control">
                        @foreach(\Kathford\Lib\Status::$current as $index => $status)
                            <option value="{{ $index }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-bold mb-2" for="isShown">Is Shown</label>
                    <select wire:model.defer="isShown" id="isShown" class="form-control">
                        <option value="0">Show</option>
                        <option value="1">Hide</option>
                    </select>
                </div>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-bold mb-2" for="slug">Slug</label>
                    <input type="text" wire:model.defer="slug" class="form-control" id="slug">

                    @error('slug') <span class="error">{{ $message }}</span> @enderror

                </div>

            </div>

            <div class="row col-lg-12 mt-5">

                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="fs-5 fw-bold mb-2" for="icon">Icon</label>
                    <input type="file" wire:model.defer="icon" class="form-control" id="icon">

                    @error('icon') <span class="error">{{ $message }}</span> @enderror

                </div>

                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="fs-5 fw-bold mb-2" for="seo_title">Seo Title</label>
                    <input type="text" wire:model.defer="seo_title" class="form-control" id="seo_title">

                    @error('seo_title') <span class="error">{{ $message }}</span> @enderror

                </div>

                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <div class="col-md-10 fv-row fv-plugins-icon-container">
                        <label class="fs-5 fw-bold mb-2" for="seo_description">Seo Description</label>
                        <textarea wire:model.defer="seo_description" id="seo_description" rows="5" class="form-control"></textarea>

                        @error('seo_description') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-primary rounded">
        </div>
    </form>
</div>