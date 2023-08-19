<div class="modal-body">
    <form id="updateForm" class="updateForm" method="POST" action="{{ route('advertisements.update', $advertisement->id) }}">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{ $advertisement->id }}" name="id">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title') ." ". trans('admin.arabic') }}</label>
                    <input type="text" class="form-control" value="{{ $advertisement->getTranslation('title', 'ar') }}" name="title_ar">
                </div>
                <div class="col-md-12 mt-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title')  ." ". trans('admin.english') }}</label>
                    <input type="text" class="form-control" value="{{ $advertisement->getTranslation('title', 'en') }}" name="title_en">
                </div>
                <div class="col-md-12 mt-3">
                    <label for="title" class="form-control-label">{{ trans('admin.title') ." ". trans('admin.france') }}</label>
                    <input type="text" class="form-control" value="{{ $advertisement->getTranslation('title', 'fr')}}" name="title_fr">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <label for="image" class="form-control-label">{{ trans('admin.image') }}</label>
                    <input type="file" name="image" class="dropify" data-default-file="{{ asset('uploads/advertisements/images/'.$advertisement->image) }}">
                </div>
                <div class="col-md-12 mt-3">
                    <label for="background_image"
                        class="form-control-label">{{ trans('admin.background_image') }}</label>
                    <input type="file" name="background_image" class="dropify" data-default-file="{{ asset('uploads/advertisements/background_image/'.$advertisement->background_image) }}"">
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <label for="category_id" class="form-control-label">{{ trans('admin.category') }}</label>
                    <select name="category_id" class="form-control" required>
                        @foreach ($data['categories'] as $category)
                        <option value="{{ $category->id }}" style="text-align: center" {{ ($category->category_id == $advertisement->category_id ) ? 'selected' : " " }}>{{ $category->getTranslation('category_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="service_id" class="form-control-label">{{ trans('admin.service') }}</label>
                    <select name="service_id" class="form-control" required>
                        @foreach ($data['services'] as $service)
                        <option value="{{ $service->id }}" style="text-align: center" {{ ($service->service_id == $advertisement->sevice_id ) ? 'selected' : " " }}>{{ $service->getTranslation('service_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label for="file" class="form-control-label">{{ trans('admin.attachment_file') }}</label>
                    <input name="file" type="file" value="{{ asset($advertisement->file) }}" data-default-file="{{ asset($advertisement->file) }}" class="form-control dropify" />
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.arabic') }}</label>
                    <textarea name="description_ar" class="form-control" rows="8">{{ $advertisement->getTranslation('description', 'ar') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.english') }}</label>
                    <textarea name="description_en" class="form-control" rows="8">{{ $advertisement->getTranslation('description', 'en') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="name_ar" class="form-control-label">{{ trans('admin.desc') ." ". trans('admin.france') }}</label>
                    <textarea name="description_fr" class="form-control" rows="8">{{ $advertisement->getTranslation('description', 'fr') }}</textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-success" id="updateButton">{{ trans('admin.update') }}</button>
        </div>
    </form>
</div>
<script>
    $('.dropify').dropify()

    CKEDITOR.replaceAll();

    $('.dropify').dropify();

    $(document).ready(function() {
        $('select').select2();
    });
</script>
