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
 * Guilherme Cabrini da Silva  - S2it		   		15/02/2012	                       Create file 
 * 
 */

class CivilCertificateParser extends BasicParser{

	public static function getCivilCertificateValues($object){


		$civilCertificate									= array();
		$civilCertificate[CCF_ID_UF]						= self::validateValue(trim($object['_222_SigUfCertidPessoa']), Parser::is_string(), TRUE);
		$civilCertificate[CCF_CERTIFICATE_TYPE]				= self::validateValue(trim($object['_217_CodCertidCivilPessoa']), Parser::is_numeric(), TRUE);
		$civilCertificate[CCF_TERM]							= self::validateValue(trim($object['_218_CodTermoCertidPessoa']), Parser::is_string(), TRUE);
		$civilCertificate[CCF_BOOK]							= self::validateValue(trim($object['_219_CodLivroTermoCertidPessoa']), Parser::is_string(), TRUE);
		$civilCertificate[CCF_LEAF]							= self::validateValue(trim($object['_220_CodFolhaTermoCertidPessoa']), Parser::is_string(), TRUE);
		$civilCertificate[CCF_EMISSION_DATE]				= self::dateFormat(self::validateValue(trim($object['_221_DtaEmissaoCertidPessoa']), Parser::is_numeric()), TRUE);
		$civilCertificate[CCF_REGISTRY_OFFICE_NAME]			= self::validateValue(trim($object['_223_NomCartorioPessoa']), Parser::is_string(), TRUE);

		
		return $civilCertificate;
	}
}