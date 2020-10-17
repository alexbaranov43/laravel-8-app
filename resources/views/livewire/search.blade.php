<div style="align-content: center">
    {{-- Be like water. --}}
    <input type="text" wire:model="searchTerm" />

    <ul>
        @foreach($users as $user)
            <li>
                <p>
                    {{$user->name}}
                </p>
            </li>
        @endforeach
    </ul>
</div>
