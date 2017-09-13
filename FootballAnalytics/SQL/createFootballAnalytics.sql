-- MySQL Script generated by MySQL Workbench
-- Mon Sep 11 00:35:25 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema FootballAnalytics
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema FootballAnalytics
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `FootballAnalytics` DEFAULT CHARACTER SET utf8 ;
USE `FootballAnalytics` ;

-- -----------------------------------------------------
-- Table `FootballAnalytics`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FootballAnalytics`.`user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `pwhash` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `registration_date` DATETIME NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `id_user_UNIQUE` (`id_user` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `pwhash_UNIQUE` (`pwhash` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FootballAnalytics`.`team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FootballAnalytics`.`team` (
  `id_team` INT NOT NULL AUTO_INCREMENT,
  `id_user` INT NOT NULL,
  `team_name` VARCHAR(255) NOT NULL,
  `team_short_name` VARCHAR(45) NOT NULL,
  `team_logo` VARCHAR(99) NULL,
  PRIMARY KEY (`id_team`),
  UNIQUE INDEX `id_team_UNIQUE` (`id_team` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FootballAnalytics`.`coach`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FootballAnalytics`.`coach` (
  `id_coach` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `pwhash` VARCHAR(255) NOT NULL,
  `name` VARCHAR(99) NOT NULL,
  `email` VARCHAR(99) NOT NULL,
  `photo` VARCHAR(99) NULL,
  `birthdate` DATE NULL,
  PRIMARY KEY (`id_coach`),
  UNIQUE INDEX `id_coach_UNIQUE` (`id_coach` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `pwhash_UNIQUE` (`pwhash` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FootballAnalytics`.`team_coach`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FootballAnalytics`.`team_coach` (
  `id_team_coach` INT NOT NULL AUTO_INCREMENT,
  `id_team` INT NOT NULL,
  `id_coach` INT NOT NULL,
  PRIMARY KEY (`id_team_coach`),
  UNIQUE INDEX `id_team_coach_UNIQUE` (`id_team_coach` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FootballAnalytics`.`player`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FootballAnalytics`.`player` (
  `id_player` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `pwhash` VARCHAR(255) NOT NULL,
  `name` VARCHAR(99) NOT NULL,
  `email` VARCHAR(99) NULL,
  `photo` VARCHAR(99) NULL,
  `birthdate` DATE NULL,
  PRIMARY KEY (`id_player`),
  UNIQUE INDEX `id_player_UNIQUE` (`id_player` ASC),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `pwhash_UNIQUE` (`pwhash` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FootballAnalytics`.`position`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FootballAnalytics`.`position` (
  `id_position` INT NOT NULL AUTO_INCREMENT,
  `position` VARCHAR(99) NOT NULL,
  PRIMARY KEY (`id_position`),
  UNIQUE INDEX `id_position_UNIQUE` (`id_position` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `FootballAnalytics`.`team_player`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FootballAnalytics`.`team_player` (
  `id_team_player` INT NOT NULL AUTO_INCREMENT,
  `id_team` INT NOT NULL,
  `id_player` INT NOT NULL,
  `id_position` INT NOT NULL,
  `height` INT NULL,
  `weight` DECIMAL(6,2) NULL,
  `team_photo` VARCHAR(99) NULL,
  `position_short` VARCHAR(12) NULL,
  PRIMARY KEY (`id_team_player`),
  UNIQUE INDEX `id_team_player_UNIQUE` (`id_team_player` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
