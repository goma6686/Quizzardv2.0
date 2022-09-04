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
	        	<div class="progress position-relative" style="background-color: #aaa; -webkit-box-shadow: none; box-shadow: none;">
  				  <div class="progress-bar" role="progressbar" style="width: {{ $user->xp%100 }}%" aria-valuemin="0" aria-valuemax="100"><small class="justify-content-center d-flex position-absolute w-100">{{ $user->xp%100 . '/100 XP' }}</small></div>
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
<div class="py-2 ">
	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
		<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
			<div class="p-6 bg-white border-b border-gray-200">
				<div class="container text-center">
					<div class="row align-items-start">
						<div class="col">
							<div class="card" style="width: 18rem;">
								<div class="card-header">Questions Created:</div>								
								<div class="card-body">
								  <p class="card-text">{{$user->questions_count}}</p>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 18rem;">
								<div class="card-header">Games Played:</div>								
								<div class="card-body">
								  <p class="card-text">{{$user->games_played}}</p>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="card" style="width: 18rem;">
								<div class="card-header">Global Rank:</div>								
								<div class="card-body">
								  <p class="card-text">{{$index}}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</x-app-layout>