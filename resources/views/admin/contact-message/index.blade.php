@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Contact messages') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.All messages') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.social-link.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
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
                            <th>{{ __('admin.Email') }}</th>
                            <th>{{ __('admin.Subject') }}</th>
                            <th>{{ __('admin.Message') }}</th>
                            <th>{{ __('admin.Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ ++$loop->index }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#messageModal-{{ $message->id }}"><i class="fas fa-envelope"></i></a>
                                        <a href="{{ route('admin.social-link.destroy', $message->id) }}"
                                           class="btn btn-danger delete-item"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @foreach ($messages as $message)
        <div class="modal fade" id="messageModal-{{ $message->id }}" tabindex="-1" role="dialog"
             aria-labelledby="messageModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="messageModalLabel">{{ __('admin.Reply to') }}: {{ $message->email }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('admin.Close') }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.contact.send-reply') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="subject">{{ __('admin.Subject') }}</label>
                                <input type="hidden" name="message_id" value="{{ $message->id }}">
                                <input type="hidden" name="email" value="{{ $message->email }}">
                                <input type="text" name="subject" id="subject" class="form-control">
                                @error('subject')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message">{{ __('admin.Message') }}</label>
                                <textarea name="message" class="form-control" style="height: 200px !important;" id="message"></textarea>
                                @error('message')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ __('admin.Close') }}</button>
                                <button type="submit" class="btn btn-primary">{{ __('admin.Send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
