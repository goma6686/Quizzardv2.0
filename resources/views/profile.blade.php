<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="col-md-20 text-center" id="app">
        	<div class="row">
        	  <div class = "col-4"></div>
	          <div class = "col-2">
				<img src="{{ $user->profile_pic }}" style="height: 125px !important">
		      </div>
		      <div class = "col-2" style="line-height: 40px">
				<p class="m-b-10">{{ $user->email }}</p>
	            <p><strong>{{ $user->name }}</strong></p>
	        	<div class="progress position-relative">
  				  <div class="progress-bar" role="progressbar" style="width: {{ $user->xp%100 }}%" aria-valuemin="0" aria-valuemax="100"><small class="justify-content-center d-flex position-absolute w-100" style="-webkit-text-stroke-width: .25px;
  -webkit-text-stroke-color: black;">{{ $user->xp%100 . '/100 XP' }}</small></div>
  				</div>
  				<span class="badge bg-primary">LVL {{ intval($user->xp/100) }}</span>
			  </div>
			  <div class = "col-4"></div>
            </div>
          </div>
        </div>
	  </div>
    </div>
  </div>
</x-app-layout>