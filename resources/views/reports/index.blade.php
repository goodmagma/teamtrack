@extends('layouts.app')

@section('title', 'Reports')
@if ($workSessions->total() == 0)
    @section('subtitle', 'No projects yet')
@else
    @section('subtitle', "{$workSessions->firstItem()}-{$workSessions->lastItem()} of {$workSessions->total()} projects")
@endif

@section('actions')

<div class="col-auto ms-auto d-print-none">
	<div class="btn-list">
        <a href="{{route('projects.new', $workspace)}}" class="btn btn-primary d-none d-sm-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
            {{__("New Project")}}
        </a>
        <a href="{{route('projects.new', $workspace)}}" class="btn btn-primary d-sm-none btn-icon" aria-label="{{__("New Project")}}">
	        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
        </a>
	</div>
	
</div>

@endsection

@section('content')

<div class="row g-4">
              <div class="col-md-3">
                <form action="./" method="get" autocomplete="off" novalidate="" class="sticky-top">
                  <div class="form-label">Job Types</div>
                  <div class="mb-4">
                    <label class="form-check">
                      <input type="checkbox" class="form-check-input" name="form-type[]" value="1" checked="">
                      <span class="form-check-label">Programming</span>
                    </label>
                    <label class="form-check">
                      <input type="checkbox" class="form-check-input" name="form-type[]" value="2" checked="">
                      <span class="form-check-label">Design</span>
                    </label>
                    <label class="form-check">
                      <input type="checkbox" class="form-check-input" name="form-type[]" value="3">
                      <span class="form-check-label">Management / Finance</span>
                    </label>
                    <label class="form-check">
                      <input type="checkbox" class="form-check-input" name="form-type[]" value="4">
                      <span class="form-check-label">Customer Support</span>
                    </label>
                    <label class="form-check">
                      <input type="checkbox" class="form-check-input" name="form-type[]" value="5">
                      <span class="form-check-label">Sales / Marketing</span>
                    </label>
                  </div>
                  <div class="form-label">Remote</div>
                  <div class="mb-4">
                    <label class="form-check form-switch">
                      <input class="form-check-input" type="checkbox">
                      <span class="form-check-label form-check-label-on">On</span>
                      <span class="form-check-label form-check-label-off">Off</span>
                    </label>
                  </div>
                  <div class="form-label">Salary Range</div>
                  <div class="mb-4">
                    <label class="form-check">
                      <input type="radio" class="form-check-input" name="form-salary" value="1" checked="">
                      <span class="form-check-label">$20K - $50K</span>
                    </label>
                    <label class="form-check">
                      <input type="radio" class="form-check-input" name="form-salary" value="2" checked="">
                      <span class="form-check-label">$50K - $100K</span>
                    </label>
                    <label class="form-check">
                      <input type="radio" class="form-check-input" name="form-salary" value="3">
                      <span class="form-check-label">&gt; $100K</span>
                    </label>
                    <label class="form-check">
                      <input type="radio" class="form-check-input" name="form-salary" value="4">
                      <span class="form-check-label">Drawing / Painting</span>
                    </label>
                  </div>
                  <div class="form-label">Immigration</div>
                  <div class="mb-4">
                    <label class="form-check form-switch">
                      <input class="form-check-input" type="checkbox">
                      <span class="form-check-label form-check-label-on">On</span>
                      <span class="form-check-label form-check-label-off">Off</span>
                    </label>
                    <div class="small text-secondary">Only show companies that can sponsor a visa</div>
                  </div>
                  <div class="form-label">Location</div>
                  <div class="mb-4">
                    <select class="form-select">
                      <option>Anywhere</option>
                      <option>London</option>
                      <option>San Francisco</option>
                      <option>New York</option>
                      <option>Berlin</option>
                    </select>
                  </div>
                  <div class="mt-5">
                    <button class="btn btn-primary w-100">
                      Confirm changes
                    </button>
                    <a href="#" class="btn btn-link w-100">
                      Reset to defaults
                    </a>
                  </div>
                </form>
              </div>
              <div class="col-md-9">
                <div class="row row-cards">
                  <div class="space-y">
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-auto">
                          <div class="card-body">
                            <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-1.jpg)"></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body ps-0">
                            <div class="row">
                              <div class="col">
                                <h3 class="mb-0"><a href="#">Lead Tailwind Developer</a></h3>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    CMS Max</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / USA</div>
                                </div>
                                <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    CMS Max</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / USA</div>
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="mt-3 badges">
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">PHP</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">Laravel</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">CSS</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">Vue</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-auto">
                          <div class="card-body">
                            <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-2.png)"></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body ps-0">
                            <div class="row">
                              <div class="col">
                                <h3 class="mb-0"><a href="#">Frontend Web Engineer</a></h3>
                              </div>
                              <div class="col-auto fs-3 text-green">$140,000 - $180,000</div>
                            </div>
                            <div class="row">
                              <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Center Pixel, Inc</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time or Contract</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / Palo Alto, CA</div>
                                </div>
                                <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Center Pixel, Inc</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time or Contract</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / Palo Alto, CA</div>
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="mt-3 badges">
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">HTML</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">CSS</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">React</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">+3</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-auto">
                          <div class="card-body">
                            <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-3.png)"></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body ps-0">
                            <div class="row">
                              <div class="col">
                                <h3 class="mb-0"><a href="#">Principal Web Application Developer</a></h3>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Chicago Botanic Garden</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Hybrid / Chicago Botanic Garden</div>
                                </div>
                                <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Chicago Botanic Garden</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Hybrid / Chicago Botanic Garden</div>
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="mt-3 badges">
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">HTML</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">PHP</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">Laravel</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-auto">
                          <div class="card-body">
                            <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-4.png)"></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body ps-0">
                            <div class="row">
                              <div class="col">
                                <h3 class="mb-0"><a href="#">Front-End Developer</a></h3>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Simple Focus</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / USA</div>
                                </div>
                                <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Simple Focus</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / USA</div>
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="mt-3 badges">
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">HTML</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">PHP</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">CSS</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">+2</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-auto">
                          <div class="card-body">
                            <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-5.png)"></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body ps-0">
                            <div class="row">
                              <div class="col">
                                <h3 class="mb-0"><a href="#">Senior Front-End Engineer</a></h3>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Infinia ML</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Durham, NC</div>
                                </div>
                                <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Infinia ML</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Durham, NC</div>
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="mt-3 badges">
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">HTML</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">PHP</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">CSS</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">+4</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-auto">
                          <div class="card-body">
                            <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-6.png)"></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body ps-0">
                            <div class="row">
                              <div class="col">
                                <h3 class="mb-0"><a href="#">Senior Web Developer, Open Source</a></h3>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Crowd Favorite</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / USA</div>
                                </div>
                                <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Crowd Favorite</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / USA</div>
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="mt-3 badges">
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">HTML</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">JavaScript</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">CSS</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">+8</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-auto">
                          <div class="card-body">
                            <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-7.png)"></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body ps-0">
                            <div class="row">
                              <div class="col">
                                <h3 class="mb-0"><a href="#">Frontend Engineer</a></h3>
                              </div>
                              <div class="col-auto fs-3 text-green">$95,000 – $145,000 USD</div>
                            </div>
                            <div class="row">
                              <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Spear AI</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Washington D.C.</div>
                                </div>
                                <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Spear AI</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Washington D.C.</div>
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="mt-3 badges">
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">HTML</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">JavaScript</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">CSS</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">+3</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-auto">
                          <div class="card-body">
                            <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-8.png)"></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body ps-0">
                            <div class="row">
                              <div class="col">
                                <h3 class="mb-0"><a href="#">Web Developer</a></h3>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Third Time Games</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / North America</div>
                                </div>
                                <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Third Time Games</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / North America</div>
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="mt-3 badges">
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">PHP</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">Laravel</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">React</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">+8</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="row g-0">
                        <div class="col-auto">
                          <div class="card-body">
                            <div class="avatar avatar-md" style="background-image: url(./static/jobs/job-9.jpg)"></div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card-body ps-0">
                            <div class="row">
                              <div class="col">
                                <h3 class="mb-0"><a href="#">Laravel Developer</a></h3>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md">
                                <div class="mt-3 list-inline list-inline-dots mb-0 text-secondary d-sm-block d-none">
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Mindsize</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-inline-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / USA</div>
                                </div>
                                <div class="mt-3 list mb-0 text-secondary d-block d-sm-none">
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/building-community -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path><path d="M13 7l0 .01"></path><path d="M17 7l0 .01"></path><path d="M17 11l0 .01"></path><path d="M17 15l0 .01"></path></svg>
                                    Mindsize</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/license -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path><path d="M9 7l4 0"></path><path d="M9 11l4 0"></path></svg>
                                    Full-time</div>
                                  <div class="list-item"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path></svg>
                                    Remote / USA</div>
                                </div>
                              </div>
                              <div class="col-md-auto">
                                <div class="mt-3 badges">
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">PHP</a>
                                  <a href="#" class="badge badge-outline text-secondary fw-normal badge-pill">Laravel</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
