<div class="ibox-content">
        <div class="container">

            <div class="row col-lg-12">
                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-bold mb-2" for="parent_category">Choose Parent Category</label>
                    <select id="parent_category" class="form-control"
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
                    <select id="subCategory" class="form-control">
{{--                        @if(count($this->childCategory) > 0)--}}
{{--                            <option value="0">-- Select One --</option>--}}
{{--                            @foreach($this->childCategory as $index => $childCategory)--}}
{{--                                <option value="{{ $index }}">{{ $childCategory }}</option>--}}
{{--                            @endforeach--}}
{{--                        @endisset--}}
                    </select>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <label class="required fs-3 fw-bold mb-2" for="name">Name</label>
                    {!! Form::text('name', $data['category']->name , ['class' => 'form-control', 'id' => 'name']) !!}
                    <div class="fv-plugins-message-container invalid-feedback"></div>

                    @error('name') <span class="error">{{ $message }}</span> @enderror

                </div>
            </div>

            <div class="row col-lg-12">
                <div class="col-md-12 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-bold mb-2" for="description">Description</label>
                    {!! Form::textarea('description', $data['category']->description, ['class' => 'form-control', 'cols' => 80, 'rows' => 10, 'id' => 'description']) !!}
                    <div class="fv-plugins-message-container invalid-feedback"></div>

                    @error('description') <span class="error">{{ $message }}</span> @enderror

                </div>

            </div>

            <div class="row col-lg-12 mt-5">
                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-bold mb-2" for="status">Status</label>
                    {!! Form::select('status', \Kathford\Lib\Status::$current, $data['category']->status, ['class' => 'form-control', 'id' => 'status']) !!}
                </div>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-bold mb-2" for="isShown">Is Shown</label>
                    {!! Form::select('isShown', ['0' => 'Show', '1' => 'Hide'], $data['category']->is_shown, ['class' => 'form-control', 'id' => 'isShown']) !!}
                </div>

                <div class="col-md-4 fv-row fv-plugins-icon-container">
                    <label class="required fs-5 fw-bold mb-2" for="slug">Slug</label>
                    {!! Form::text('slug', $data['category']->slug , ['class' => 'form-control', 'id' => 'slug']) !!}
                    @error('slug') <span class="error">{{ $message }}</span> @enderror

                </div>

            </div>

            <div class="row col-lg-12 mt-5">

                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="fs-5 fw-bold mb-2" for="icon">Icon</label>
                    <input type="file" class="form-control" id="icon">

                    @error('icon') <span class="error">{{ $message }}</span> @enderror

                </div>

                <div class="col-md-3 fv-row fv-plugins-icon-container">
                    <label class="fs-5 fw-bold mb-2" for="seo_title">Seo Title</label>
                    {!! Form::text('seo_title', $data['category']->seo_title , ['class' => 'form-control', 'id' => 'seo_title']) !!}
                    @error('seo_title') <span class="error">{{ $message }}</span> @enderror

                </div>

                <div class="col-md-6 fv-row fv-plugins-icon-container">
                    <div class="col-md-10 fv-row fv-plugins-icon-container">
                        <label class="fs-5 fw-bold mb-2" for="seo_description">Seo Description</label>
                        {!! Form::textarea('seo_description', $data['category']->seo_description , ['class' => 'form-control', 'id' => 'seo_description']) !!}

                        @error('seo_description') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-primary rounded">
        </div>
    </form>
</div>