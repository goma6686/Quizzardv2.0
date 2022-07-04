<x-app-layout>
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