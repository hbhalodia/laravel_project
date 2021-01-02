<div>
    <div class="flex justify-center pb-3 px-4">
        <h2 class="text-lg">Edit Steps if Required</h2>
        <span wire:click="increment" class="fas fa-plus cursor-pointer px-3 py-1" />
    </div>
    @foreach ($steps as $step)
        <div class="flex justify-center py-1" wire:key="{{$loop->index}}">
            <input type="text" name="stepName[]" value="{{$step['name']}}" placeholder="Describe Step {{$loop->index+1}}" class="py-2 px-2 border rounded-lg"/>
            <span wire:click="decrement({{$loop->index}})" class="fas fa-times cursor-pointer px-4 py-3 text-red-400" />
        </div>
    @endforeach
</div>
