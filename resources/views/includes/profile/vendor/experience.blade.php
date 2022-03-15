<div class="rounded-md bg-gray-900 px-3 py-2">
    
    <h3><i class="fa fa-history mr-2"></i>Trust Level</h3>
    <hr>

    <div class="progress" style="height: 30px">
        <div class="progress-bar @if($vendor->experience < 0) bg-danger @endif" role="progressbar"
             style="width: {{$vendor->nextLevelProgress()}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            Level {{$vendor->getLevel()}} ({{$vendor->nextLevelProgress()}}%)
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
            <p>Current Trust Level: <span>{{$vendor->getLevel()}}</span></p>
            <p>Current Trust Points: <span>{{$vendor->experience}}</span></p>
            <p>Trust Points required for the next Trust Level: <span>{{max($vendor->nextLevelXp()-$vendor->experience,0)}}</span></p>
            @if($vendor->experience < 0)
                <div class="card mb-3">
                    <div class="card-header">Negative Trust Points</div>
                    <div class="card-body">
                        <p>You currently have Negative Trust Level points, all of your offers will be labeled with this tag:</p>
                        <p class="text-danger border border-danger rounded p-1 mt-2 text-center"><span class="fas fa-exclamation-circle"></span> Negative Trust Points, Deal with Caution !</p>
                    </div>
                    <div class="card-footer text-muted">
                        If you think this is an error, please submit a Support Ticket.
                    </div>
                </div>

            @endif
        </div>
    </div>
</div>