@component('mail:message')
    #Thank you for activate your account
    @component('mail:panel')
        for activate your account 
    @endcomponent
    @component('mail:button',['url'=>$url])
    click here
    @endcomponent
    Thank you
    <br>
    {{ config("app.name") }}
@endcomponent