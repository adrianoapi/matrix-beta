--112@##lUCzbOr3snWTJ4REb55V&H(tMqmAMr2T#a#$@
--##$$#22249***lUCzbOr3snWTJ4REb55V&H(tMqmAMr2T***3T#a#$@
update chronos.tb_dispositivo_status set pacote_status_12 = 'Y' where dispositivo_id = 4306;

SELECT     s.pacote_status_12, s.dispositivo_status_voltagem_bateria AS bateria, 
           md.modelo_dispositivo_id, 
           da.dispositivo_id, 
           pe.pessoa_id, 
           --chronso.Fnc_converte_data(s.dispositivo_status_voltagem_bateria_dataAS dispositivo_status_voltagem_bateria_data,
           CASE 
                      WHEN Substr(po.posicao_hdop::bit(8)::character VARYING(8)::text, 7, 1)::integer > 0 THEN 1
                      ELSE 0 
           END AS violado_inclusao, 
           CASE 
                      WHEN Substr(pe.posicao_hdop::bit(8)::character VARYING(8)::text, 8, 1)::integer > 0 THEN 1
                      ELSE 0 
           END AS violado_exclusao, 
           CASE 
                      WHEN s.pacote_status_01::text = 'N'::text 
                      OR         s.pacote_status_02::text = 'N'::text THEN 1 
                      ELSE 0 
           END AS violado_rompido, 
           CASE 
                      WHEN s.pacote_status_03::text = 'N'::text 
                      OR         s.pacote_status_04::text = 'N'::text THEN 1 
                      ELSE 0 
           END AS violado_aberto, 
           CASE 
                      WHEN ( 
                                            s.pacote_status_39 = 'N' 
                                 OR         s.pacote_status_40 = 'N' 
                                 OR         s.pacote_status_41 = 'N') THEN 1 
                      ELSE 0 
           END AS violado_rompido_pid, 
           CASE 
                      WHEN ( 
                                            s.pacote_status_45 = 'N') THEN 1 
                      ELSE 0 
           END AS bateria_fraca_pid, 
           CASE 
                      WHEN s.chamada_perdida = 'N' THEN 1 
                      ELSE 0 
           END AS violado_chamada_perdida_solo, 
           --case when s.chamada_perdida_total = 'N' then 1 else 0 end AS violado_chamada_perdida_ambos, 
           CASE 
                      WHEN s.chamada_perdida = 'N' 
                      AND        s2.chamada_perdida = 'N' THEN 1 
                      ELSE 0 
           END AS violado_chamada_perdida_ambos, 
           CASE 
                      WHEN s.alcool_device_violation = 'N' THEN 1 
                      ELSE 0 
           END AS alcool_device_violacao, 
           CASE 
                      WHEN s.alcool_device_foto = 'N' THEN 1 
                      ELSE 0 
           END AS alcool_foto_violacao, 
           CASE 
                      WHEN s.alcool_device_testwindow = 'N' THEN 1 
                      ELSE 0 
           END AS alcool_device_test, 
           CASE 
                      WHEN s.violacao_circulacao_area = 'N' THEN 1 
                      ELSE 0 
           END AS violado_area_circulacao, 
           CASE 
                      WHEN s.dispositivo_desligado = 'N' THEN 1 
                      ELSE 0 
           END AS dispositivo_desligado, 
           CASE 
                      WHEN s.pacote_status_12 = 'N' THEN 1 
                      ELSE 0 
           END AS energia, 
           --case when s.proximidade_vitima = 'N' then 1 else 0 end AS proximidade_vitima 
           CASE 
                      WHEN s.proximidade_vitima_rf = 'N' THEN 1 
                      ELSE 0 
           END AS proximidade_vitima_rf, 
           CASE 
                      WHEN s.proximidade_vitima_gps = 'N' THEN 1 
                      ELSE 0 
           END AS proximidade_vitima_gps, 
           CASE 
                      WHEN s.pacote_status_63 = 'N' THEN 1 
                      ELSE 0 
           END AS button_call, 
           CASE 
                      WHEN s.pacote_status_64 = 'N' THEN 1 
                      ELSE 0 
           END       AS button_emergency 
FROM       chronos.tb_pessoa AS pe 
JOIN       chronos.tb_uf     AS uf 
ON         pe.uf_id = uf.uf_id 
JOIN       chronos.tb_cliente c 
ON         pe.cliente_id = c.cliente_id 
JOIN       chronos.tb_unidade u 
ON         pe.unidade_id = u.unidade_id 
INNER JOIN chronos.tb_dispositivo_ativacao AS da 
ON         ( 
                      da.pessoa_id = pe.pessoa_id 
           AND        da.dispositivo_ativacao_dt_hr_desativacao IS NULL AND da.dispositivo_ativacao_dt_hr_ativacao IS NOT NULL) 
INNER JOIN chronos.tb_dispositivo_status s 
ON         da.dispositivo_id = s.dispositivo_id 
INNER JOIN chronos.tb_dispositivo d 
ON         da.dispositivo_id = d.dispositivo_id 
INNER JOIN chronos.tb_modelo_dispositivo AS md 
ON         md.modelo_dispositivo_id = d.modelo_dispositivo_id 
LEFT JOIN  chronos.tb_dispositivo AS ds2 
ON         ( 
                      ds2.dispositivo_id = pe.pessoa_dispositivo_id_mu) 
LEFT JOIN  chronos.tb_dispositivo_status AS s2 
ON         ( 
                      s2.dispositivo_id = ds2.dispositivo_id) 
LEFT JOIN  chronos.tb_posicao AS po 
ON         ( 
                      d.posicao_id = po.posicao_id) 
WHERE      md.tipo_programa = 'G' 
AND        d.dispositivo_id in (4306)
