<div style="align-content: center">
    {{-- Be like water. --}}
    <input type="text" wire:model="searchTerm" />

    <ul>
        @foreach($users as $user)
            <li>
                <p>
                    <a href="/user/{{$user->id}}">{{$user->name}}</a>
                </p>
            </li>
        @endforeach
    </ul>
</div>
