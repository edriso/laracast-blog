<x-layout>
    <x-setting heading="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.input name="thumbnail" type="file" required />
            <x-form.textarea name="excerpt" required />
            <x-form.textarea name="body" required />
            <x-form.select
                name='category_id'
                labelText='category'
                :items="\App\Models\Category::all()"
                required
            />
            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
