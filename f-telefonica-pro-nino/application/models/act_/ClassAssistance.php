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

define('CLA_ID_CLASS','id_class');
define('CLA_ID_ASSISTANCE','id_assistance');
define('CLA_ID_STATUS','id_status');

require_once (CLS_ASSISTANCE.".php");
require_once (CLS_STATUSCLASS.".php");
require_once (CLS_CLASSMODEL.".php");

class ClassAssistance extends Zend_Db_Table_Abstract
{
	protected $_name = TBL_CLASS_ASSISTANCE;
	protected $_primary = array(CLA_ID_CLASS, CLA_ID_ASSISTANCE);
	
	protected $_referenceMap    = array(
        CLS_ASSISTANCE => array(
            'columns'           => CLA_ID_ASSISTANCE,
            'refTableClass'     => CLS_ASSISTANCE,
            'refColumns'        => AST_ID_ASSISTANCE
        ),
        CLS_STATUSCLASS => array(
            'columns'           => CLA_ID_STATUS,
            'refTableClass'     => CLS_STATUSCLASS,
            'refColumns'        => STS_ID_STATUS
        ),
        CLS_CLASSMODEL => array(
            'columns'           => CLA_ID_CLASS,
            'refTableClass'     => CLS_CLASSMODEL,
            'refColumns'        => CLS_ID_CLASS
        )
    );
}
