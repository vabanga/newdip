<div class="cd-faq-items">
    @foreach($themes as $theme)
        <ul id="<?=$theme->name?>" class="cd-faq-group">
            <li class="cd-faq-title"><h2><?=$theme->name?></h2></li>
            @foreach($tabJoin as $tab)
                @if($tab->theme == "$theme->name")
                    <li>
                        <a class="cd-faq-trigger" href="#0"><?=$tab->questions?></a>
                        <div class="cd-faq-content">
                            <p><?=$tab->answer?></p>
                        </div> <!-- cd-faq-content -->
                    </li>
                @endif
            @endforeach
        </ul>
    @endforeach
</div> <!-- cd-faq-items -->
<a href="#0" class="cd-close-panel">Close</a>