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

define('FAM_ID_FAMILY','id_family');
define('FAM_ID_PERSON','id_person');
define('FAM_ID_KINSHIP','id_kinship');

require_once (CLS_PERSON.".php");
require_once (CLS_KINSHIPTYPE.".php");
require_once (CLS_FAMILY_ID.".php");

class Family extends Zend_Db_Table_Abstract
{
	protected $_name = TBL_FAMILY;
	protected $_primary = array(FAM_ID_FAMILY, FAM_ID_PERSON, FAM_ID_KINSHIP);
		
	protected $_referenceMap    = array(
        CLS_PERSON => array(
            'columns'           => FAM_ID_PERSON, 
            'refTableClass'     => CLS_PERSON, 
            'refColumns'        => PRS_ID_PERSON
        ),
        CLS_KINSHIPTYPE => array(
            'columns'           => FAM_ID_KINSHIP, 
            'refTableClass'     => CLS_KINSHIPTYPE, 
            'refColumns'        => KST_ID_KINSHIP
        ),
        CLS_FAMILY_ID => array(
            'columns'           => FAM_ID_FAMILY, 
            'refTableClass'     => CLS_FAMILY_ID, 
            'refColumns'        => FID_ID_FAMILY
        )
    );	
}
