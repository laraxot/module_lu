<div>
    <ol>
        @foreach($items as $item)
            <li><a href="#" wire:click.prevent="click('{{ $item['guid'] }}')">{{ $item['title'] }}</a></li>
        @endforeach
    </ol>
</div>
