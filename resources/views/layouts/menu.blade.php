<li class="nav-item {{ Request::is('faqCategories*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('adminPanel.faqCategories.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Faq Categories</span>
    </a>
</li>
<li class="nav-item {{ Request::is('faqs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('adminPanel.faqs.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Faqs</span>
    </a>
</li>
