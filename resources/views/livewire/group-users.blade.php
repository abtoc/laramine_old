<div class="row mb-3">
    <table class="table w-100">
        <thead>
            <th class="text-center">{{ __('User') }}</th>
            <th class="text-end"><button class="btn btn-none" data-bs-toggle="modal" data-bs-taget="#group_users_modal"><i class="bi bi-person-plus"></i>{{ __('New User') }}</button></th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="align-middle">
                        <a href="{{ route('users.show', ['user' => $user->id]) }}">{{ $user->name }}</a>
                    </td>
                    <td class="text-end">
                        <button class="btn btn-none" wire:click="destroy({{ $user->id }})"><i class="bi bi-trash"></i>{{ __('Delete')}}</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal" id="group_users_modal" role="dialog" tabindex="-1" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    aaaa
                </div>
            </div>
        </div>
    </div>
</div>
