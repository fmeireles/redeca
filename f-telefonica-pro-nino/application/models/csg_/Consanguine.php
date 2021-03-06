<?php
/*
 * This program is free software: you can redistribute it and/or modify 
 * it under the terms of the GNU General Public License as published by 
 * the Free Software Foundation, either version 2 of the License, or 
 * (at your option) any later version. 
 * 
 * This program is distributed in the hope that it will be useful, 
 * but WITHOUT ANY WARRANTY; without even the implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the 
 * GNU General Public License for more details. 
 *
 * You should have received a copy of the GNU General Public License 
 * along with this program.  If not, see <http://www.gnu.org/licenses/>. 
 * 
 * @copyright Funda��o Telef�nica - http://www.fundacaotelefonica.org.br 
 * 
 * @copyright Prefeitura Municipal de Ara�atuba - http://www.aracatuba.sp.gov.br 
 * @copyright Prefeitura Municipal de Bebedouro - http://www.bebedouro.sp.gov.br 
 * @copyright Prefeitura Municipal de Diadema - http://www.diadema.sp.gov.br 
 * @copyright Prefeitura Municipal de Guaruj� - http://www.guaruja.sp.gov.br 
 * @copyright Prefeitura Municipal de Itapecerica - http://www.itapecerica.sp.gov.br 
 * @copyright Prefeitura Municipal de Mogi das Cruzes - http://www.pmmc.com.br 
 * @copyright Prefeitura Municipal de S�o Carlos - http://www.saocarlos.sp.gov.br 
 * @copyright Prefeitura Municipal de V�rzea Paulista - http://www.varzeapaulista.sp.gov.br 
 * 
 * @copyright Copyright (C) 2008
 * 
 * @license GNU General Public License (GPL) - http://www.gnu.org/licenses/gpl.html 
 * 
 * @author Consulting services for Social Networks Creation by Instituto Fonte para o Desenvolvimento Social  - < fonte@fonte.org.br> - http:// www.fonte.org.br 
 * 
 * @author Consulting services for Software Requirements  by WebUse - <webuse@webuse.com.br > - http://webuse.com.br 
 * 
 * @author Initial Software development by S2it Solutions - <s2it@s2it.com.br> - http://s2it.com.br 
 * 
 * Changelog
 * 
 * Author                                           Date                               History 
 * -----------------------------------------        ------------                       ------------------ 
 * Jefferson Barros Lima  - S2it		   				13/02/2008	                       Create file 
 * 
 */

define('CSG_ID_PERSON_FROM','id_person_from');
define('CSG_ID_CONSANGUINE_TYPE','id_consanguine_type');
define('CSG_ID_PERSON_TO','id_person_to');

require_once (CLS_PERSON.".php");
require_once (CLS_CONSANGUINETYPE.".php");

class Consanguine extends Zend_Db_Table_Abstract
{
	protected $_name = TBL_CONSANGUINE;
	protected $_primary = array(CSG_ID_PERSON_FROM, CSG_ID_PERSON_TO);
	
	//CLS_CONSANGUINE	: mapeamento da pessoa dona do perfil - CSG_ID_PERSON_FROM
	//CLS_PERSON 		: mapeamento da pessoa resgatada na busca - CSG_ID_PERSON_TO
	protected $_referenceMap    = array(
        CLS_PERSON => array(
            'columns'           => CSG_ID_PERSON_TO, 
            'refTableClass'     => CLS_PERSON, 
            'refColumns'        => PRS_ID_PERSON
        ),
		CLS_CONSANGUINE => array(
            'columns'           => CSG_ID_PERSON_FROM,
            'refTableClass'     => CLS_PERSON,
            'refColumns'        => PRS_ID_PERSON
        ),
        CLS_CONSANGUINETYPE => array(
            'columns'           => CSG_ID_CONSANGUINE_TYPE,
            'refTableClass'     => CLS_CONSANGUINETYPE, 
            'refColumns'        => CTP_ID_CONSAGUINE_TYPE
        )
    );
}
