<ul class="cd-faq-categories">
    @foreach($themes as $theme)
        <li><a href="#<?=$theme->name?>"><?=$theme->name?></a></li>
    @endforeach
</ul> <!-- cd-faq-categories -->