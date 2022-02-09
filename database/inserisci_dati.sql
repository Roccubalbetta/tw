INSERT INTO `venditore` (`idvenditore`, `uservenditore`, `passvenditore`, `nomevenditore`, `attivo`, `indirizzovenditore`) VALUES
(1, 'tuttocarta@squola.com', 'abc000', 'Riccardo Sanità', 1, 'Via Roma 118'),
(2, 'tuttopenne@squola.com', 'abc111', 'Giacomo Monti', 1, 'Via P.Gobetti 15');

ALTER TABLE `venditore`
  MODIFY `idvenditore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

INSERT INTO `utente` (`idutente`, `userutente`, `passutente`, `nomeutente`, `attivo`) VALUES
(1, 'Simba', 'Roccubalbetta', 'Simba', 1);

ALTER TABLE `utente`
  MODIFY `idutente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

INSERT INTO `categoria` (`idcategoria`, `nomecategoria`,`imgcategoria`, `imgslide`) VALUES
(1, 'Scrittura', "write.svg", "Scrittura.jpg"),
(2, 'Precisione', "Compass.svg", "righelli.jpg"),
(3, 'Quaderni', "notebook.svg", "quaderno.jpg"),
(4, 'Altro', "calculation.svg", "calcolatrice.jpg");


INSERT INTO `steps` (`idstep`, `nomestep`,`imgstep`) VALUES
(1, 'Scegli', "firststep.svg"),
(2, 'Paga', "thirdstep.svg"),
(3, 'Aspetta', "secondstep.svg"),
(4, 'Usa', "forthstep.svg");



ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

INSERT INTO `prodotto` (`idprodotto`, `nomeprodotto`, `prezzoprodotto`, `imgprodotto`, `venditore`, `quantita`) VALUES
(1, 'Penna Nera', 2, 'bicNera.jpg', 1,10),
(2, 'Penna Blu', 2, 'bicBlu.jpg', 2,10),
(3, 'Penna Rossa', 2, 'bicRossa.jpg', 1,10),
(4, 'Penna Verde', 2, 'bicVerde.jpg', 2,10),
(5, 'Matita 2H', 1, 'matita2H.jpg', 1,10),
(6, 'Matita 2B', 1, 'matita2B.jpg', 2,10),
(7, 'Evidenziatore Giallo', 3, 'evidenziatoreG.jpg', 1,10),
(8, 'Evidenziatore Verde', 3, 'evidenziatoreV.jpg', 2,10),
(9, 'Gognometro', 4, 'goniometro.jpg', 2,10),
(10, 'Squadra 30/60', 5, 'squadra60.jpg', 1,10),
(11, 'Squadra 45', 5, 'squadra45.jpg', 1,10),
(12, 'Righello', 3, 'righello.jpg', 2,10),
(13, 'Quadreno', 1, 'quaderni.jpg', 1,10),
(14, 'Block Notes', 1, 'blockNotes.jpg', 1,10),
(15, 'Fogli coi buchi', 1, 'fogliQuadretti.jpg', 2,10),
(16, 'Fogli Protocollo', 1, 'fogliProtocollo.jpg', 2,10),
(17, 'Carta Millimetrata', 1, 'cartaMillimetrata.jpg', 1,10),
(18, 'Diario', 1, 'quaderniRighe.jpg', 2,10),
(19, 'Risma A4', 1, 'rsima.jpg', 1,10),
(20, 'Gomma', 1, 'gomma.jpg', 2,10),
(21, 'Calcolatrice', 8, 'calcolatriceprodotto.jpg', 1,10),
(22, 'Cancellina', 1, 'cancelina.jpg', 2,10);



ALTER TABLE `prodotto`
  MODIFY `idprodotto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

INSERT INTO `prodotto_ha_categoria` (`prodotto`, `categoria`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 4),
(21, 4),
(22, 4);


