<x-app-layout>
<<<<<<< HEAD
    <!-- TABS -->
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="admin-tab" data-bs-toggle="tab" data-bs-target="#admin-tab-pane" type="button" role="tab" aria-controls="admin-tab-pane" aria-selected="true">Admin</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Approve Questions
            <span class="badge text-bg-secondary">{{$count}}</span>
          </button>
        </li>
    </ul>
    <!-- TABS CONTENT -->
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="admin-tab-pane" role="tabpanel" aria-labelledby="admin-tab" tabindex="0">
            <!-- VERTICAL PILLS -->
            <div class="p-4 d-flex">
                <ul class="nav d-flex align-items-start flex-column nav-pills me-3" id="myTab" role="tablist" aria-orientation="horizontal">
                    <li class="nav-item " role="presentation">
                        <button class="nav-link active" href="#questions" id="v-pills-questions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-questions" type="button" role="tab" aria-controls="v-pills-questions" aria-selected="true">questions</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" href="#users" id="v-pills-users-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users" type="button" role="tab" aria-controls="v-pills-users" aria-selected="false">users</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" href="#categories" id="v-pills-categories-tab" data-bs-toggle="pill" data-bs-target="#v-pills-categories" type="button" role="tab" aria-controls="v-pills-categories" aria-selected="false">categories</button>
                    </li>
                </ul>
                <!-- VERTICAL PILLS CONTENT-->
                <div class="tab-content d-flex justify-content-center w-100 p-4 bg-white border border-secondary" id="v-pills-tabContent">
                    <div class="tab-pane fade show active "  href="#questions" id="v-pills-questions" role="tabpanel" aria-labelledby="v-pills-questions-tab" tabindex="0">
                        @include('admin.layout.question')
                    </div>
                    <div class="tab-pane fade" href="#users" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab" tabindex="0">
                        @include('admin.layout.users')
                    </div>
                    <div class="tab-pane fade" href="#categories" id="v-pills-categories" role="tabpanel" aria-labelledby="v-pills-categories-tab" tabindex="0">
                        @include('admin.layout.categories')
                    </div>
                </div>
            </div>
        </div>
        <!-- TABS CONTENT 2-->
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <div class="p-5">
                <div class=" justify-content-center w-100 p-2 bg-white border border-secondary">
                    <div class="p-5 border border-secondary">
                        @include('admin.layout.approve')
                    </div>
                </div>
=======
    <div class="p-4 d-flex align-items-start">
        <ul class="nav flex-column nav-pills me-3" id="myTab" role="tablist" aria-orientation="vertical">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" href="#questions" id="v-pills-questions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-questions" type="button" role="tab" aria-controls="v-pills-questions" aria-selected="true">questions</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" href="#users" id="v-pills-users-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users" type="button" role="tab" aria-controls="v-pills-users" aria-selected="false">users</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" href="#categories" id="v-pills-categories-tab" data-bs-toggle="pill" data-bs-target="#v-pills-categories" type="button" role="tab" aria-controls="v-pills-categories" aria-selected="false">categories</button>
            </li>
        </ul>

        <div class="tab-content p-6 bg-white" id="v-pills-tabContent">
            <div class="tab-pane fade show active"  href="#questions" id="v-pills-questions" role="tabpanel" aria-labelledby="v-pills-questions-tab" tabindex="0">.questions..</div>
            <div class="tab-pane fade" href="#users" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab" tabindex="0">
                @include('admin.layout.users')
            </div>
            <div class="tab-pane fade" href="#categories" id="v-pills-categories" role="tabpanel" aria-labelledby="v-pills-categories-tab" tabindex="0">
                @include('admin.layout.categories')
>>>>>>> 3435db419e1b57988185f5d2060c78375189396d
            </div>
        </div>
    </div>
    <script>
        $(document).ready(() => {
        let url = location.href.replace(/\/$/, "");
        
        if (location.hash) {
            const hash = url.split("#");
            $('#myTab button[href="#'+hash[1]+'"]').tab("show");
            url = location.href.replace(/\/#/, "#");
            history.replaceState(null, null, url);
            setTimeout(() => {
            $(window).scrollTop(0);
            }, 400);
        } 
        
        $('button[data-bs-toggle="pill"]').on("click", function() {
            let newUrl;
            const hash = $(this).attr("href");
            if(hash == "#questions") {
            newUrl = url.split("#")[0];
            } else {
            newUrl = url.split("#")[0] + hash;
            }
            newUrl += "/";
            history.replaceState(null, null, newUrl);
        });
        });
    </script>
</x-app-layout>