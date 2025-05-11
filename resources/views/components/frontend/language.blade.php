<div class="relative inline-block text-text-primary dark:text-text-white">
    <select id="langSwitcher"
        class="appearance-none bg-transparent pl-2 pr-6 py-2 border-none text-inherit hover:text-text-accent dark:hover:text-text-accent transition-all duration-300 ease-linear cursor-pointer">
        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
        <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>বাংলা</option>
    </select>
    <i data-lucide="chevron-down"
        class="absolute right-1 top-1/2 -translate-y-1/2 pointer-events-none text-text-primary dark:text-text-white group-hover/dropdown:text-text-accent transition-all duration-300 ease-linear"></i>
</div>

