<div class="col-xs-12 admin-header">
	<h3 class="col-xs-6 col-sm-3 col-md-2">
		<i class="users icon"></i> Usuarios
	</h3>
	<!--<a href="add-slider" class="ui inverted button"><i class="add icon"></i> Nuevo</a>-->
</div>


<!-- Muestra todos los artículos existentes -->

<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 news-form">
	<table class="ui stackable table tblUsers">
		<thead class="hidden-phone">
			<tr>
				<th>Nombre de usuario</th>
				<th>Rol</th>
				<th>Email</th>
				<th width="50">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user) { ?>
				<tr>
					<td data-th="Nombre de usuario"><?php echo $user['username']; ?></td>
					<td data-th="Rol"><?php echo $user['role']; ?></td>
					<td data-th="Email"><?php echo $user['email']; ?></td>
					<td data-th="Acciones"><i class="edit icon btnEditUser" data-sliderId="<?php echo $user['user_id']; ?>" title="Editar"></i><i class="trash outline icon btnRemoveUser" data-userId="<?php echo $user['user_id']; ?>" title="Eliminar"></i></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>