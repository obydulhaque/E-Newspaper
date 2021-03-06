@extends('layouts.master')

@section('content')
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left"> News Form</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                {!! Form::open(['url'=>'news-contain-store','id'=>'register-form','class'=>'form-horizontal','method'=>'post','enctype' => 'multipart/form-data','files'=>true])!!}

                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead"> Title </label>
                            <div class="controls">
                                <input type="text" name="news_title" class="span6" id="typeahead">
                                @foreach($errors->get('news_title') as $error)
                                <b><span style="color: red">{{ $error }}</span></b>
                                @endforeach
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="select01">Main Category</label>
                            <div class="controls">
                                <select name="sel_min_category" id="select01" class="main_category">
                                    <option>Select....</option>
                                    @foreach($min_category_show as $value)
                                    <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="select01">Select Sub-Category</label>
                            <div class="controls">
                                <select name="sel_sub_category" id="select01" class="sub_category">
                                    <option value="0">First select main category</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Image Upload</label>
                            <div class="controls">
                                <input name="news_image" class="input-file uniform_on" id="fileInput" type="file">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Editor</label>
                            <div class="controls">
                                 <input type="text" name="news_editor" value="">
                                @foreach($errors->get('news_editor') as $error)
                                <b><span style="color: red">{{ $error }}</span></b>
                                @endforeach
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Status</label>
                            <div class="controls">
                               <select name="news_status">
                                   <option>Select</option>
                                   <option value="1">Published</option>
                                   <option value="0">unpublished</option>
                                   @foreach($errors->get('news_status') as $error)
                                   <b><span style="color: red">{{ $error }}</span></b>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Selected News ?</label>
                            <div class="controls">
                                Yes <input type="checkbox" name="news_selected" value="1">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="span12" id="content">
                                <div class="row-fluid">
                                    <!-- block -->
                                    <div class="block">
                                        <div class="navbar navbar-inner block-header">
                                            <div class="muted pull-left">CKEditor Full</div>
                                        </div>
                                        <div class="block-content collapse in">
                                            <textarea name="news_content" id="ckeditor_full"></textarea>
                                            @foreach($errors->get('news_content') as $error)
                                            <b><span style="color: red">{{ $error }}</span></b>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- /block -->
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                {!! Form::close() !!}


            </div>
        </div>
    </div>
    <!-- /block -->
</div>

@endsection
