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

                {{-- @can('users view')
                <li class="nav-item {{ Request::is('adminPanel/users*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('adminPanel.users.index') }}">
                    <i class="nav-icon icon-user"></i>
                    <span>@lang('models/users.plural')</span>
                </a>
                </li>
                @endcan --}}
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

                {{-- <li class="nav-item {{ Request::is('adminPanel/transactions*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('adminPanel.users.transactions') }}">
                    <i class="nav-icon icon-user"></i>
                    <span>@lang('models/transactions.plural')</span>
                </a>
                </li> --}}

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
                {{--
                @can('faqCategories view')
                <li class="nav-item {{ Request::is('adminPanel/faqCategories*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('adminPanel.faqCategories.index') }}">
                    <i class="nav-icon icon-cursor"></i>
                    <span>@lang('models/faqCategories.plural')</span>
                </a>
                </li>
                @endcan

                @can('faqs view')
                <li class="nav-item {{ Request::is('adminPanel/faqs*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('adminPanel.faqs.index') }}">
                        <i class="nav-icon icon-cursor"></i>
                        <span>@lang('models/faqs.plural')</span>
                    </a>
                </li>
                @endcan --}}

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


{{--////////// Products ////////////--}}
{{-- <div class="accordion nav-item" id="accordionProducts">
    <div class="card bg-dark m-0">
        <div class="card-header p-1" id="headingProducts">
            <h2 class="mb-0">
                <button class="btn btn-link text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="true" aria-controls="collapseProducts">
                    <i class="nav-icon icon-basket mr-2"></i>
                    <strong>Shop</strong>
                </button>
            </h2>
        </div>

        <div id="collapseProducts" class="collapse " aria-labelledby="headingProducts" data-parent="#accordionProducts">
            <div class="card-body bg-secondary p-0">

                <li class="nav-item {{ Request::is('adminPanel/categories*') ? 'active' : '' }}">
<a class="nav-link" href="{{ route('adminPanel.categories.index') }}">
    <i class="nav-icon icon-cursor"></i>
    <span>@lang('models/categories.plural')</span>
</a>
</li>

<li class="nav-item {{ Request::is('adminPanel/products*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('adminPanel.products.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>@lang('models/products.plural')</span>
    </a>
</li>

<li class="nav-item {{ Request::is('adminPanel/reviews*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('adminPanel.reviews.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>@lang('models/reviews.plural')</span>
    </a>
</li>
</div>
</div>
</div>
</div> --}}


{{--////////// Jobs ////////////--}}
<div class="accordion nav-item" id="accordionJobs">
    <div class="card bg-dark m-0">
        <div class="card-header p-1" id="headingJobs">
            <h2 class="mb-0">
                <button class="btn btn-link text-decoration-none" type="button" data-toggle="collapse" data-target="#collapseJobs" aria-expanded="true" aria-controls="collapseJobs">
                    <i class="nav-icon icon-docs mr-2"></i>
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



{{-- <li class="nav-item {{ Request::is('adminPanel/chats*') ? 'active' : '' }}">
<a class="nav-link" href="{{ route('adminPanel.chats.index') }}">
    <i class="nav-icon icon-cursor"></i>
    <span>@lang('models/chats.plural')</span>
</a>
</li>
<li class="nav-item {{ Request::is('adminPanel/messages*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('adminPanel.messages.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>@lang('models/messages.plural')</span>
    </a>
</li>
<li class="nav-item {{ Request::is('adminPanel/chatContacts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('adminPanel.chatContacts.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>@lang('models/chatContacts.plural')</span>
    </a>
</li> --}}
