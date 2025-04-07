@php
    $data = $this->form->getRawState();
    $record = $this->record;
    extract($data,\EXTR_SKIP);
@endphp

<p>Name: {{ $data['name'] }}</p>
<p>Email: {{ $record['email'] }}</p>
