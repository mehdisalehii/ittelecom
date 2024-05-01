@extends('layouts.app')

@section('title','مقالات')
@section('titleAdmin',' | داشبورد')
@section('titleWebname',' | '. 'آی‌تی‌تلکام')

@section('content')
    <div class="lists index" data-fetch="scroll">
        <div class="lists-pan">
            {{-- @include('web.inc.breadcrumb.blog') --}}
            @include('admin.pages.post.partials.toolbar')
            @include('errors.messages')
            <div class="archive">
                <div style="margin:20px 0px;">این بخش هنوز تحت توسعه است ولی برای تکمیل شدن آن نیاز به محتوا داریم
                </div>
                <form method="POST" action="{{ route('admin.faq.store') }}">
                    @csrf
                    <div style="margin: 20px; padding: 5px; ">
                        ابتدا صفحه دسته‌بندی را انتخاب کنید:
                        <select class="" style="width:100%; margin:0 0 15px 0; height:2rem; font-size: 1rem; background-color:#fff;" name="category" required>
                            <option type="text" value=""> انتخاب کنید </option>
                            @foreach($categories as $category)
                                <option type="text" value="{{ $category->id }}" placeholder="Subject">{{ $category->id }} - {{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="form-container">
                    @foreach($categories as $category)
                        <div>
                        @if(!is_array($category->faqs) && empty($category->faqs))
                            <div id="form-container-{{ $category->id }}" class="form-container-class" style="margin: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                <div class="form-row" style="margin-bottom: 15px;">
                                    <input type="text" class="" style="width:100%; margin:0 0 15px 0;" name="subject[]" placeholder="Subject" value="عنوان سؤال پرتکرار" required/>
                                    <textarea name="body[]" placeholder="متن پاسخ سؤال پرتکرار" required></textarea>
                                    <button type="button" class="btn btn-danger text-white bold" onclick="removeForm(this)">Remove</button>
                                </div>
                            </div>
                        @else
                            @foreach($category->faqs()->get() as $faq)
                                <div id="form-container-{{ $category->id }}" class="form-container-class" style="margin: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                    <div class="form-row" style="margin-bottom: 15px;">
                                        <input type="text" class="" style="width:100%; margin:0 0 15px 0;" name="subject[]" placeholder="Subject" value="{{ $faq->subject }}" required/>
                                        <textarea name="body[]" placeholder="Body" required>{{ $faq->body }}</textarea>
{{--                                        <button type="button" class="btn btn-danger text-white bold" onclick="removeForm(this)">Remove</button>--}}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    @endforeach
                    </div>
                    <button type="button" class="btn btn-success bold" onclick="addForm()">Add Form</button>
                    <button type="submit" class="btn btn-success bold">Submit</button>
                </form>
                <script>
                    let formValues = [];
                    let firstTime = true;

                    function getValuesOfCategoriesAndRemoveAllForms(keepIndex = 0) {
                        if (firstTime) {
                            firstTime = false;
                            @foreach($categories as $category)
                                formValues[{{ $category->id }}] = document.getElementById('form-container-{{ $category->id }}').parentNode.innerHTML;
                            @endforeach
                        }

                        // Array.from(document.getElementsByClassName('form-container-class')).forEach(element => {
                        //     element.remove();
                        // });
                        document.getElementById('form-container').innerHTML = formValues[keepIndex];
                    }

                    getValuesOfCategoriesAndRemoveAllForms(0);
                    const categorySelect = document.getElementsByName("category")[0];
                    categorySelect.addEventListener("change", function () {
                        getValuesOfCategoriesAndRemoveAllForms(categorySelect.value);
                    });

                    // JavaScript for adding a new form field
                    function addForm() {
                        const formContainer = document.getElementById('form-container');
                        const formRow = document.createElement('div');
                        formRow.classList.add('form-row');

                        formRow.innerHTML = `
                <input type="text" class="" style="width:100%; margin:0 0 15px 0;" name="subject[]" placeholder="Subject" />
                <textarea name="body[]" placeholder="Body"></textarea>
                <button type="button" class="btn btn-danger text-white bold" onclick="removeForm(this)">Remove</button>
            `;
                        formContainer.appendChild(formRow);
                    }

                    function removeForm(button) {
                        const formRow = button.parentNode.parentNode;
                        formRow.remove();
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
