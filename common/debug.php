<div class="container-fluid debug">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td colspan="3"><div class="alert alert-info text-center" role="alert">
					<h4>DEBUG</h4>
				</div></td>
		</tr>
		<tr>
			<td width="49%"><div class="alert alert-danger text-center" role="alert">
					<h5>POST</h5>
				</div></td>
			<td width="1%">&nbsp;</td>
			<td><div class="alert alert-warning text-center" role="alert">
					<h5>SESSION</h5>
				</div></td>
		</tr>
		<tr>
			<td valign="top"><?php PrintR($_POST, "danger"); ?></td>
			<td valign="top">&nbsp;</td>
			<td width="50%" valign="top"><?php PrintR($_SESSION, "warning"); ?></td>
		</tr>
		<tr>
			<td valign="top">&nbsp;</td>
			<td valign="top">&nbsp;</td>
			<td valign="top">&nbsp;</td>
		</tr>
		<tr>
			<td><div class="alert alert-danger text-center" role="alert">
					<h5>POST</h5>
				</div></td>
			<td>&nbsp;</td>
			<td><div class="alert alert-warning text-center" role="alert">
					<h5>SESSION</h5>
				</div></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><?php if ( isset($JsFilesArray)){ PrintR($JsFilesArray, "danger"); }?></td>
			<td>&nbsp;</td>
			<td><?php if ( isset($CssFilesArray) ){ PrintR($CssFilesArray, "danger"); }?></td>
		</tr>

		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3"><div class="alert alert-info text-center" role="alert">
					<h4>DEBUG</h4>
				</div></td>
		</tr>
	</table>
</div>
