<!-- COMMENT -->
<div class="flex py-4 px-4 border-b-2">
    <div class="w-16 mr-2">
        <img
            class="p-2 rounded rounded-full"
            src=" {{ url("imgs/".$comment->user->photo) }}">
    </div>
    <div class="px-2 pt-2 flex-grow">
        <header>
            <a href="#" class="text-black no-underline">
                <span class="font-medium">{{ $comment->user->name }}</span>
            </a>

            <div class="text-xs text-grey flex items-center my-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="h-4 w-4 mr-1 feather feather-calendar">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                <span>{{ $comment->created_at }}</span>
            </div>
        </header>
        <article class="py-4 text-grey-darkest">
            {{ $comment->body }}
        </article>
        <footer class="border-t border-grey-lighter text-sm flex">
            <form action="{{ route('comments.like', ['comment' => $comment->id]) }}" method="post">
                @csrf
                <button type="submit"
                        class="block no-underline text-blue flex px-4 py-2 items-center hover:bg-grey-lighter">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         width="24"
                         height="24"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round"
                         class="feather feather-thumbs-up h-6 w-6 mr-1 stroke-current">
                        <path
                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path>
                        <span> {{ $comment->likes()->count() }} </span>
                    </svg>

                </button>
            </form>

        </footer>
    </div>
</div>
