<li class="nav-item">
    <a  href="{{ $link }}" class="nav-link ms-1 {{ Request::url() === $link ? 'active-item' : ' ' }}">
        <i class="{{ $icon }}"></i>
        <span>{{ $name }}</span>
    </a>
</li>