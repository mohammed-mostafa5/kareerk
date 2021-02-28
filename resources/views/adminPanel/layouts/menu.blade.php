{{--////////// Users ////////////--}}
<div class="accordion" id="accordionUsers">
    <div class="card bg-dark m-0">
        <div class="card-header p-1" id="headingUsers">
            <h2 class="mb-0">
                <button class="btn btn-link text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
                    <i class="nav-icon icon-user  mr-2"></i>
                    <strong>Users</strong>
                </button>
            </h2>
        </div>

        <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionUsers">
            <div class="card-body bg-secondary p-0">
                @can('roles view')
                <li class="nav-item {{ Request::is('adminPanel/roles*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.roles.index') }}">
                        <i class="nav-icon icon-check "></i>
                        <span>@lang('models/roles.plural')</span>
                    </a>
                </li>
                @endcan

                @can('admins view')
                <li class="nav-item {{ Request::is('adminPanel/admins*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.admins.index') }}">
                        <i class="nav-icon icon-user"></i>
                        <span>@lang('models/admins.plural')</span>
                    </a>
                </li>
                @endcan

                @can('clients view')
                <li class="nav-item {{ Request::is('adminPanel/clients*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.clients.index') }}">
                        <i class="nav-icon icon-user"></i>
                        <span>@lang('models/clients.plural')</span>
                    </a>
                </li>
                @endcan
                @can('freelancers view')
                <li class="nav-item {{ Request::is('adminPanel/freelancers*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.freelancers.index') }}">
                        <i class="nav-icon icon-user"></i>
                        <span>@lang('models/freelancers.plural')</span>
                    </a>
                </li>
                @endcan

            </div>
        </div>
    </div>
</div>


{{--////////// Pages ////////////--}}
<div class="accordion" id="accordionPages">
    <div class="card bg-dark m-0">
        <div class="card-header p-1" id="headingPages">
            <h2 class="mb-0">
                <button class="btn btn-link text-decoration-none" type="button" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="nav-icon icon-docs mr-2"></i>
                    <strong>@lang('models/pages.plural')</strong>
                </button>
            </h2>
        </div>

        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionPages">
            <div class="card-body bg-secondary p-0">
                @can('metas view')
                <li class="nav-item {{ Request::is('adminPanel/metas*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.metas.index') }}">
                        <i class="nav-icon icon-pencil icons"></i>
                        <span>@lang('models/metas.plural')</span>
                    </a>
                </li>
                @endcan

                @can('pages view')
                <li class="nav-item {{ Request::is('adminPanel/pages*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.pages.index') }}">
                        <i class="nav-icon icon-docs"></i>
                        <span>@lang('models/pages.plural')</span>
                    </a>
                </li>
                @endcan

                @can('sliders view')
                <li class="nav-item {{ Request::is('adminPanel/sliders*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.sliders.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/sliders.plural')</span>
                    </a>
                </li>
                @endcan

                @can('blogs view')
                <li class="nav-item {{ Request::is('adminPanel/blogs*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.blogs.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/blogs.plural')</span>
                    </a>
                </li>
                @endcan

                @can('careers view')
                <li class="nav-item {{ Request::is('adminPanel/careers*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.careers.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/careers.plural')</span>
                    </a>
                </li>
                @endcan

                @can('careerRequests view')
                <li class="nav-item {{ Request::is('adminPanel/careerRequests*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.careerRequests.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/careerRequests.plural')</span>
                    </a>
                </li>
                @endcan


                @can('information view')
                <li class="nav-item {{ Request::is('adminPanel/information*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.information.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/information.plural')</span>
                    </a>
                </li>
                @endcan


                @can('socialLinks view')
                <li class="nav-item {{ Request::is('adminPanel/socialLinks*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.socialLinks.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/socialLinks.plural')</span>
                    </a>
                </li>
                @endcan

            </div>
        </div>
    </div>
</div>

{{--////////// Jobs ////////////--}}
<div class="accordion nav-item" id="accordionJobs">
    <div class="card bg-dark m-0">
        <div class="card-header p-1" id="headingJobs">
            <h2 class="mb-0">
                <button class="btn btn-link text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseJobs" aria-expanded="true" aria-controls="collapseJobs">
                    <i class="nav-icon icon-briefcase mr-2"></i>
                    <strong>Jobs</strong>
                </button>
            </h2>
        </div>

        <div id="collapseJobs" class="collapse " aria-labelledby="headingJobs" data-parent="#accordionJobs">
            <div class="card-body bg-secondary p-0">

                @can('jobs view')
                <li class="nav-item {{ Request::is('adminPanel/jobs*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.jobs.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/jobs.plural')</span>
                    </a>
                </li>
                @endcan

                @can('milestones view')
                <li class="nav-item {{ Request::is('adminPanel/milestones*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.milestones.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/milestones.plural')</span>
                    </a>
                </li>
                @endcan

                @can('services view')
                <li class="nav-item {{ Request::is('adminPanel/services*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.services.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/services.plural')</span>
                    </a>
                </li>
                @endcan
                @can('skills view')
                <li class="nav-item {{ Request::is('adminPanel/skills*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.skills.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/skills.plural')</span>
                    </a>
                </li>
                @endcan

                @can('countries view')
                <li class="nav-item {{ Request::is('adminPanel/countries*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.countries.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/countries.plural')</span>
                    </a>
                </li>
                @endcan
                @can('languages view')
                <li class="nav-item {{ Request::is('adminPanel/languages*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.languages.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/languages.plural')</span>
                    </a>
                </li>
                @endcan


            </div>
        </div>
    </div>
</div>


{{--////////// Contact ////////////--}}
<div class="accordion nav-item" id="accordionContact">
    <div class="card bg-dark m-0">
        <div class="card-header p-1" id="headingContact">
            <h2 class="mb-0">
                <button class="btn btn-link text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseContact" aria-expanded="true" aria-controls="collapseContact">
                    <i class="nav-icon icon-envelope mr-2"></i>
                    <strong>Contact</strong>
                </button>
            </h2>
        </div>

        <div id="collapseContact" class="collapse " aria-labelledby="headingContact" data-parent="#accordionContact">
            <div class="card-body bg-secondary p-0">


                @can('contacts view')
                <li class="nav-item {{ Request::is('adminPanel/contacts*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.contacts.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/contacts.plural')</span>
                    </a>
                </li>
                @endcan

                @can('newsletters view')
                <li class="nav-item {{ Request::is('adminPanel/newsletters*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.newsletters.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/newsletters.plural')</span>
                    </a>
                </li>
                @endcan

            </div>
        </div>
    </div>
</div>


@section('scripts')

<script>
    window.setTimeout(function(){
        $( ".nav-item.open a.active" ).closest( ".collapse" ).collapse("show");
    }, 700);
</script>

@endsection
