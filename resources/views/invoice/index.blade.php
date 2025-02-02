<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>dewakoding.com</title>

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

            .watermark {
				position: absolute;
				top: 70%;
				left: 50%;
				transform: translate(-50%, -50%);
				font-size: 80px;
				color: rgba(240, 16, 16, 0.1);
				white-space: nowrap;
				z-index: -1;
				user-select: none;
				pointer-events: none;
			}
		</style>
	</head>

	<body>
        @if($invoice->paid_date)
		    <div class="watermark">LUNAS</div>
        @endif
		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<h4>dewakoding.com</h4>
								</td>

								<td>
									Invoice #: 000{{$invoice->id}}<br />
									Created: {{$invoice->issued_date}}<br />
									Due: {{$invoice->due_date}}
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									To :<br />
                                    {{$invoice->project->client->name}}<br />
									{{$invoice->project->client->address}}<br />
									
								</td>
							</tr>
						</table>
					</td>
				</tr>


				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td>
                        {{$invoice->title}} ({{$invoice->project->name}})<br/>
                        {{$invoice->detail}}
                    </td>

					<td>{{$invoice->total_idr}}</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: {{$invoice->total_idr}}</td>
				</tr>

                
			</table>
            <p>Catatan :</p>
            <p>{{$invoice->notes}}</p>
		</div>
	</body>
</html>