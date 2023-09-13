@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Language</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Language</h4>
            </div>
            <div class="card-body">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label for="language">Language</label>
                        <select name="language" id="language" class="form-control">
                            <option value="">--Select--</option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input readonly type="text" id="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="default">Is it default?</label>
                        <select name="default" id="default" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="" id="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create </button>
                </form>
            </div>
        </div>
    </section>
@endsection
