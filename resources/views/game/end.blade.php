<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-md-20" id="app">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

                    <!-- Start of quiz box -->
                        <div class="px-4 -py-3 sm:px-6 ">
                            <div class="flex max-w-auto justify-between">
                                <h1 class="text-sm leading-6 font-medium text-gray-900">
                                    <span class="text-gray-400 font-extrabold p-1">User</span>
                                    <span class="font-bold p-2 leading-loose bg-blue-500 text-gray rounded-lg">{{Auth::user()->name}}</span>
                                </h1>
                            </div>
                        </div>
                        <div class="text-center">
                          @if(null !== $seed)
                            You played by seed {{$seed}}, got {{$gamescore}} questions correct, and
                            earned {{$gamexp}}XP
                          @else
                            You got {{$gamescore}} questions correct, and
                            earned {{$gamexp}}XP
                          @endif
                        </div>
                        <div class="row text-center">
                          <div class = "col-3"></div>
                          <div class = "col-2" style="line-height: 40px">
                            <p><strong>{{ $user->name }}</strong></p>
                            <div class="progress position-relative" style="background-color: #aaa; -webkit-box-shadow: none; box-shadow: none;">
                              <div class="progress-bar" role="progressbar" style="width: {{ ($user->xp-$gamexp)%100 }}%" aria-valuemin="0" aria-valuemax="100"><small class="justify-content-center d-flex position-absolute w-100">{{ ($user->xp-$gamexp)%100 . '/100 XP' }}</small></div>
                            </div>
                            <span class="badge bg-primary">LVL {{ intval(($user->xp-$gamexp)/100) }}</span>
                          </div>
                          <div class = "col-2" style="line-height: 100px">
                            <span><i class="bi bi-chevron-double-right"></i></span>
                          </div>
                          <div class = "col-2" style="line-height: 40px">
                            <p><strong>{{ $user->name }}</strong></p>
                            <div class="progress position-relative" style="background-color: #aaa; -webkit-box-shadow: none; box-shadow: none;">
                              <div class="progress-bar" role="progressbar" style="width: {{ $user->xp%100 }}%" aria-valuemin="0" aria-valuemax="100"><small class="justify-content-center d-flex position-absolute w-100">{{ $user->xp%100 . '/100 XP' }}</small></div>
                            </div>
                            <span class="badge bg-primary">LVL {{ intval($user->xp/100) }}</span>
                          </div>
                          <div class = "col-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
