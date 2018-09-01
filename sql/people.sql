--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `dob` date NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `first_name`, `dob`, `last_name`, `gender`) VALUES
(1, 'John', '1988-01-02', 'Stevenson', 'MALE'),
(2, 'Paul', '1987-01-01', 'Ropertson', 'MALE'),
(3, 'Anthony', '2018-08-06', 'Agbenu', 'MALE'),
(4, 'Anthony', '2017-06-12', 'Dogbe', 'MALE');

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
