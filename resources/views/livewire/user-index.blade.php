<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="container">
        <div>
            <h1>User Pages</h1>
        </div>
        <div>
        <ul>
            @foreach ($users as $user) 
            <li>
                <h1>$user->name</h1>
            </li>
            @endforeach
        </ul>
        </div>
    </div>
</div>
