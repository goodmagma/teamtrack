<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $template == 'daily' ? __("Today") : __("Work Sessions")}} ({{ $workSessions->count() }})</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-vcenter card-table table-striped">
                <thead>
                    <tr>
						<th class="text-medium">{{__("Date")}}</th>
                        <th class="text-medium">{{__("Project")}}</th>
                        <th class="text-medium">{{__("Task")}}</th>
                        <th class="text-medium">{{__("Description")}}</th>
                        <th class="text-medium">{{__("Duration")}}</th>
                        <th class="text-medium">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($workSessions as $workSession)
                        <tr>
 							<td>{{$workSession->started_at}}</td>
                            <td>{{$workSession->project->name}}</td>
                            <td>{{!empty($workSession->task) ? $workSession->task->title : ''}}</td>
                            <td>{{$workSession->description}}</td>
                            <td>{{format_duration($workSession->duration)}}</td>
                            <td>
								<a class="d-inline-block" href="{{route('worksessions.edit', ['workspace' => $workspace, 'workSession' => $workSession])}}">
									Edit
									<i class="ti ti-edit"></i>
								</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="page-item">{{__("No work sessions")}}</td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

            {{ $workSessions->links('layouts.pagination', ['livewire' => true]) }}

        </div>
    </div>
</div>
