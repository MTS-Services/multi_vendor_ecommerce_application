<div class="dropdown dropdown-center text-text-primary dark:text-text-white group/dropdown">
    @php($languages = [ 'en' => 'English', 'bn' => 'বাংলা' ])
    <div tabindex="0" role="button" class="m-1 flex items-center justify-center gap-3 hover:text-text-accent dark:hover:text-text-accent transition-all duration-300 ease-linear">
        <p>Session locale: {{ session('locale') }}</p>
        <p>App locale: {{ app()->getLocale() }}</p>
        {{ app()->getLocale() == 'en' ? $languages['en'] : $languages['bn'] }}
        <i data-lucide="chevron-down" class="text-text-primary dark:text-text-white hover:text-text-accent dark:hover:text-text-accent transition-all duration-300 ease-linear group-hover/dropdown:text-text-accent"></i>
    </div>

    <ul tabindex="0"
        class="dropdown-content menu bg-bg-light dark:bg-bg-darkSecondary rounded-box z-1 w-fit p-2 shadow-lg">
        <li class="text-nowrap text-center hover:text-text-accent dark:hover:text-text-accent transition-all duration-300 ease-linear">
            <a href="{{ route('locale.change', ['locale' => 'en']) }}">{{ __('English') }}</a>
        </li>
        <li class="text-nowrap text-center hover:text-text-accent dark:hover:text-text-accent transition-all duration-300 ease-linear">
            <a href="{{ route('locale.change', ['locale' => 'bn']) }}">{{ __('বাংলা') }}</a>
        </li>

    </ul>
</div>