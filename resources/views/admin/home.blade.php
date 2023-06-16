@extends('layouts.app')

@section('content')
<div class="container mt-5 ms-3">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h3>Home Dashboard</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum sint quos, dicta corporis cum doloremque dolorem nesciunt, consectetur quis eum fugiat, incidunt error ratione dolores totam pariatur beatae recusandae placeat illum accusamus dolorum excepturi. Pariatur animi voluptates quis, aliquam illo dolores impedit enim maxime quia? Illo nostrum deleniti minima! Quidem esse quas veritatis. Adipisci, enim sint cumque doloribus dolore autem placeat rem non quos sequi error facere voluptates pariatur omnis quae possimus corrupti saepe! Sequi voluptate, perferendis ex nisi, aliquid consequatur veniam incidunt odit quod doloribus blanditiis dicta deleniti modi quibusdam itaque vitae numquam rerum similique quia reiciendis fugit porro, necessitatibus nihil? Maiores, labore natus. Ipsum laboriosam quas aut sunt incidunt accusamus doloribus, nulla consectetur perspiciatis culpa voluptate magni repellat neque quasi iusto et provident dolores, amet earum est tempora. Dolor hic ipsa nostrum eum dignissimos, aut veniam! Rem excepturi amet repudiandae illum inventore facere debitis adipisci, consectetur exercitationem ea doloremque? Inventore iure porro officiis, dignissimos aliquam repellendus et, illo quos ea consequatur eum officia quia repellat laborum est qui reiciendis maiores accusantium aperiam pariatur tempore voluptates excepturi. A voluptatum qui deserunt optio quis, ex quisquam velit eveniet modi sunt eaque aliquam ab itaque obcaecati, est consequuntur facilis .</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
