<x-app-layout>
    AHA CIA PROFILIS
    <h4 class="m-t-10 m-b-5">{{ $user->name }}</h4>
    <h4 class="m-t-10 m-b-5">XP: {{ $user->xp }}</h4>
    <p class="m-b-10">{{ $user->email }}</p>
</x-app-layout>