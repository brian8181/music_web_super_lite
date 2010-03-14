<center><a href="{*$back*}"><b>Back</b></a></center>
<br />
<table align="center">
    <tr>
    {assign var="col" value="0"}
    {section name=row loop=$rows}
        {if $col == $numCols}
            </tr><tr>{assign var="col" value="0"}
        {/if}
        <td>{*$data[element]*}{include file="album_data_cell.tpl"}</td> 
        {assign var="col" value="`$col+1`"}
    {/section}
    {assign var="remainder" value="`$numCols-$col`"}
    {section name=emptyElement loop=$remainder}
        <td>&nbsp;</td>
    {/section}
    </tr>
</table>