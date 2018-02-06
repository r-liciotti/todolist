

<div class="container">
		<div class="row">
			<table class="responsive-table bordered centered">
				<thead>
					<tr>
						<th>Stato</th>
						<th>Nome</th>
						<th>Descrizione</th>
						<th>Azioni</th>
					</tr>
				</thead>
					<tbody>
						<?php foreach ($data as $row){ ?>
						<tr>

								<td><?php if($row->flag){?>
										<i class="material-icons">check</i>
								<?php}else{?>
										<i class="material-icons">bookmark</i>
									<?php}?></td>

								<td><?php echo $row->nome;?></td>
								<td><?php echo $row->descrizione;?></td>


							<td>
								<a class="waves-effect waves-light btn">Modifica</a>
								<a class="waves-effect red btn">Elimina</a>
						</td>

					</tr>
					<!-- EndForeach -->
					<?php } ?>
				</tbody>
			</table>
		</div>
</div>
