<div wire:ignore.self class="modal fade" id="modal" tabindex="-1" role="dialog" data-backdrop="static"
    data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <ul class="nav nav-tabs nav-justified mb-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link w-100 active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Document In</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link w-100" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Document Out</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <livewire:documents.in />
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <livewire:documents.out />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
