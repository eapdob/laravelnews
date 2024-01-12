@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.subscribers') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.send_mail_to_subscribers') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.subscriber.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('admin.subject') }}</label>
                        <input type="text" class="form-control" name="subject">
                        @error('subject')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.message') }}</label>
                        <textarea name="message" class="summernote" id="" cols="30" rows="10"></textarea>
                        @error('message')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.send') }}</button>
                </form>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.all_subscribers') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.subscriber.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.create_new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-sub">
                        <thead>
                        <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>{{ __('admin.email') }}</th>
                            <th>{{ __('admin.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($subscribers as $subscriber)
                            <tr>
                                <td>{{ $subscriber->id }}</td>
                                <td>{{ $subscriber->email }}</td>
                                <td>
                                    <a href="{{ route('admin.subscriber.destroy', $subscriber->id) }}"
                                       class="btn btn-danger delete-item">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#table-sub").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [1]
            }]
        });
    </script>
@endpush
