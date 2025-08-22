<tr>
	<td class="header" style="padding:25px 0;text-align:center">
		<a href="{{ config('app.url') }}" style="display:inline-flex;align-items:center;gap:8px;color:#111827;text-decoration:none;">
			<img src="{{ asset('Pertamina.png') }}" alt="Pertamina" width="40" height="40" style="display:inline-block;border-radius:6px;" />
			<span style="font-size:16px;font-weight:600;line-height:1;color:#111827;">{{ $slot ?? config('app.name') }}</span>
		</a>
	</td>
</tr>