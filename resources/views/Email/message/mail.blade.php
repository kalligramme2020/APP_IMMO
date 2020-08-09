@component('mail::message')
# salut !! Mr L'adminidtrateur


@component('mail::panel')
   le mr au identifiant suisvant vien de
      s'inscrire sur votre application.
    souhaitez vou luis laisser un message????
@endcomponent

$name,
$email .


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
