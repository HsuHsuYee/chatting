<style>
    .left {
    color: red;
    justify-content: flex-start;
    align-items: center; /* Center items vertically */
}

.right {
    color: green;
    justify-content: flex-end;
}

.message {
    display: flex;
    margin-bottom: 10px;
}

.message img {
    margin-right: 10px;
}

.img-fluid {
    max-width: 100px; /* Adjust size as needed */
    height: auto;
}

</style>

<div class="{{ $type === 'admin' ? 'left' : 'right' }} message">

    @if (!empty($image))
        <img src="{{ asset('storage/' . $image) }}" alt="image" class="img-fluid msg" />
    @endif
    <p class="msg">{{ $message }}</p>
</div>
